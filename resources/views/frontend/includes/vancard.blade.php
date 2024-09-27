<div class="bg-white p-6 rounded-lg border">
    <div class="relative">
        <!-- Image Carousel -->
        <div class="rounded-lg">
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse ($van->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ $image->getUrl() }}" width="100%">
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <img src="{{ $van->display_image->getUrl() }}" width="100%">
                        </div>
                    @endforelse

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- Vehicle Info -->
    <div class="mt-4">
        <h3 class="text-lg font-bold">{{ $van->name }}</h3>
        <p class="text-sm text-gray-500">{{ $van->category->name }}</p>
        <p class="text-sm text-gray-500">${{ $van->price }} / day</p>

        <!-- Features -->
        <div class="flex items-center justify-between space-x-2 mt-2">
            @foreach ($van->facilities as $facility)
                <span class="text-sm font-medium text-gray-400 flex flex-col justify-center items-center">
                    {!! $facility->svg_code !!}
                    {{ $facility->name }}
                </span>
            @endforeach

        </div>

        <!-- Action Button -->
        <div class="mt-4">
            <button class="bg-black text-white px-6 py-3 rounded-md w-full continue-booking-btn"
                @if (isset($form_submit) && $form_submit) onclick="document.getElementById('booking-form').submit()" @else wire:click.prevent="openExtrasModal({{ $van }})" @endif>Continue
                Booking</button>

        </div>
    </div>
</div>
