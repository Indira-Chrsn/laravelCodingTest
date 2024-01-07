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
                    <h3 class="text-center my-4">Insert Rating</h3>
                </div>
                <div>
                <a href="{{ route('books.index')}}">Back</a>
                </div>
                <form name="form1" id="form1" action="{{ route('vote.insert') }}" method="POST">
                    @csrf
                    
                <!-- dropdown for author name -->
                    Book Author : <select name="authorSelect" id="authorSelect">
                        @foreach ($books as $book)
                            <option value="{{ $book->author }}">{{ $book->author }}</option>                        
                        @endforeach
                    </select>
                    <br></br>

                    <!-- dropdown for selected author's book -->
                    Book Name   : <select name="bookSelect" id="bookSelect">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                    <br></br>

                    Insert Rating  : <select name="rating" id="rating">
                        @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    <input type="submit" value="Submit">
                </form>
                    

                    <!-- <a href="{{ route('author.show')}}">Top 10 Authors </a> | <a href=""> Rate a Book</a> -->

                
            </div>
        </div>
    </div>
</body>
</html>