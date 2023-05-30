@extends('layouts.admin')

@section('content')

    <div class="flex pt-20 max-w-6xl mx-auto space-x-4 pb-20">
        <div class="flex flex-col w-1/3 bg-[#C69B7B] pt-14 px-11 pb-8 justify-between rounded-2xl">
            <div class="flex flex-col space-y-8">
                <a href="{{ route('admin/dashboard') }}"><h2 class="text-white text-2xl font-bold">Manage Transactions</h2></a>
                <hr class="bg-white">
                <a href="{{ route('admin/barang') }}"><h2 class="text-white text-2xl font-bold">Manage Barang</h2></a>
                <hr class="bg-white">
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <h2 class="text-2xl text-red-600 font-bold text-center cursor-pointer" onclick="event.preventDefault();
                this.closest('form').submit();">Logout</h2>
            </form>
        </div>
        <div class="flex flex-col w-2/3 bg-white pt-14 px-11 pb-8 rounded-2xl">
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold">Manage Transactions</h1>
            </div>
            <div class="mt-16">
                <table id="datatables">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Transaction ID</td>
                            <td>Pembeli</td>
                            <td>Alamat</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->name }}</td>
                            <td>{{ $transaction->address }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>
                                <a href="{{ route('admin/transaction/accept', $transaction->id) }}"><button class="py-2 px-4 text-center text-white bg-green-500 rounded-2xl">Done</button></a>
                                <a href="{{ route('admin/transaction/delete', $transaction->id) }}"><button class="py-2 px-4 text-center text-white bg-red-500 rounded-2xl mt-2">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#datatables').DataTable({
                "bLengthChange" : false,
                pageLength: 5,
            });
        });
    </script>

@endsection