<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookStore</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Top 10 Most Famous Author</h3>
                </div>
                <div>
                <a href="{{ route('books.index')}}">Back</a>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- <a href="{{ route('books.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BUKU</a> -->
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Author</th>
                                <th scope="col">Voter</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp

                                @forelse ($books as $book)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->voter}}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data buku belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>