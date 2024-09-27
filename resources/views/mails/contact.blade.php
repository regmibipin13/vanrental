Hello Admin <br>
You have received a new contact message. <br>
<table border="1">
    <tr>
        <th>Name</th>
        <td>{{ $data['name'] }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $data['email'] }}</td>
    </tr>
    <tr>
        <th>Message</th>
        <td>{{ $data['message'] }}</td>
    </tr>
</table>