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
                    <h3 class="text-center my-4">John Doe's Book Store</h3>
                </div>
                <form name="form1" id="form1" action="{{ route('books.index') }}" method="GET">
                    
                <!-- dropdown for amount of books to show -->
                    List shown  : <select name="nShown" id="nShown">
                        @foreach ($amounts as $amount)
                        <option value="{{ $amount }}" {{ $amountToShow == $amount ? 'selected' : '' }}>{{ $amount }}</option>
                            <!-- <option value="{{ $amount }}">{{ $amount }}</option> -->
                        @endforeach
                    </select>
                    <br></br>

                    <!-- input author name to search -->
                    <!-- <input type="hidden" name="nShown" value="{{ $amountToShow }}"> -->
                    Search      : <input type="text" id="searchItem" placeholder="Enter author name" name="searchItem" value="{{ old('searchItem') }}">
                    <input type="submit" value="Submit">
                    <br></br>

                    <a href="{{ route('author.show')}}">Top 10 Authors </a> | <a href="{{ route('vote.options') }}"> Rate a Book</a>

                </form>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- <a href="{{ route('books.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BUKU</a> -->
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Avg. Rating</th>
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
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->category }}</td>
                                    <td>{{$book->author}}</td>
                                    <td>{{$book->rating}}</td>
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

    <script>
        function search() {
            document.getElementById('nShown').value = document.getElementById('nShown').value;
            document.getElementById('form1').submit();
        }
    </script>


</body>
</html>