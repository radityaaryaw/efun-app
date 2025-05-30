<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Peminjam</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status Peminjaman</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrow as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->users->username }}</td>
            <td>{{ $item->book->title }}</td>
            <td>{{ $item->lending_date }}</td>
            <td>{{ $item->return_date }}</td>
            <td>{{ $item->lending_status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>