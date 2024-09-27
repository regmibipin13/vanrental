<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVanRequest;
use App\Http\Requests\StoreVanRequest;
use App\Http\Requests\UpdateVanRequest;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Van;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VanController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('van_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Van::with(['category', 'facilities'])->select(sprintf('%s.*', (new Van)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'van_show';
                $editGate      = 'van_edit';
                $deleteGate    = 'van_delete';
                $crudRoutePart = 'vans';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('category.total_seats', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->total_seats) : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('display_image', function ($row) {
                if ($photo = $row->display_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('total_number_of_vans', function ($row) {
                return $row->total_number_of_vans ? $row->total_number_of_vans : '';
            });
            $table->editColumn('is_enabled', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enabled ? 'checked' : null) . '>';
            });
            $table->editColumn('facilities', function ($row) {
                $labels = [];
                foreach ($row->facilities as $facility) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $facility->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'display_image', 'is_enabled', 'facilities']);

            return $table->make(true);
        }

        $categories = Category::get();
        $facilities = Facility::get();

        return view('admin.vans.index', compact('categories', 'facilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('van_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facilities = Facility::pluck('name', 'id');

        return view('admin.vans.create', compact('categories', 'facilities'));
    }

    public function store(StoreVanRequest $request)
    {
        $van = Van::create($request->all());
        $van->facilities()->sync($request->input('facilities', []));
        if ($request->input('display_image', false)) {
            $van->addMedia(storage_path('tmp/uploads/' . basename($request->input('display_image'))))->toMediaCollection('display_image');
        }

        foreach ($request->input('images', []) as $file) {
            $van->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $van->id]);
        }

        return redirect()->route('admin.vans.index');
    }

    public function edit(Van $van)
    {
        abort_if(Gate::denies('van_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facilities = Facility::pluck('name', 'id');

        $van->load('category', 'facilities');

        return view('admin.vans.edit', compact('categories', 'facilities', 'van'));
    }

    public function update(UpdateVanRequest $request, Van $van)
    {
        $van->update($request->all());
        $van->facilities()->sync($request->input('facilities', []));
        if ($request->input('display_image', false)) {
            if (! $van->display_image || $request->input('display_image') !== $van->display_image->file_name) {
                if ($van->display_image) {
                    $van->display_image->delete();
                }
                $van->addMedia(storage_path('tmp/uploads/' . basename($request->input('display_image'))))->toMediaCollection('display_image');
            }
        } elseif ($van->display_image) {
            $van->display_image->delete();
        }

        if (count($van->images) > 0) {
            foreach ($van->images as $media) {
                if (! in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $van->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $van->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.vans.index');
    }

    public function show(Van $van)
    {
        abort_if(Gate::denies('van_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $van->load('category', 'facilities');

        return view('admin.vans.show', compact('van'));
    }

    public function destroy(Van $van)
    {
        abort_if(Gate::denies('van_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $van->delete();

        return back();
    }

    public function massDestroy(MassDestroyVanRequest $request)
    {
        $vans = Van::find(request('ids'));

        foreach ($vans as $van) {
            $van->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('van_create') && Gate::denies('van_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Van();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
