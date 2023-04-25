<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $fruits = ['apple','orange','banana'];
        $myself = (Object)[
            "name"=> "Thwe Thwe",
            "age" => 20,
            "job" =>'developer'

];

        @endphp
        {!!"<h1>Hello</h1>"!!}
        {{-- {{dd($fruits)}} --}}
        <script>
            const fruits = @json($fruits);
            const myself = @json($myself);
            console.log(fruits);
            console.log(myself);
        </script>


</body>