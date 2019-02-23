@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                {{-- <a href="{{ route('article.create') }}" class="btn btn-primary mb-3">Add Article</a> --}}
                <table class="table table-bordered">
                    <tr class="tr">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>

                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }} <a href="{{ route('article.edit', $user) }}" >Baca Selenkapnya</a></td>
                            {{-- <td>{{ $user->user->name }}</td> --}}
                            {{-- <td>
                                <a href="{{ route('article.edit', $user) }}" class="btn btn-primary">Edit</a>
                                <button href="{{ route('article.destroy', $user) }}" class="btn btn-danger" id="delete">Delete</button>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <form action="" method="post" id="deleteForm">
      @csrf
      @method("DELETE")
      <input type="submit" value="" style="display:none">
    </form>
@endsection

@push('extra-script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        $('button#delete').on('click', function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            console.log(href);
            // var title = $(this).data('title');

            swal({
                title: "Kamu yakin untuk hapus data ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    swal("Data dihapus!", {
                    icon: "success",
                    });
                }
            });
        });
      </script>
@endpush
