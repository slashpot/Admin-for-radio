<div class="col-sm-3 col-md-2 sidebar">

    <ul class="nav nav-sidebar">
        <li class="active"><a href="/admin">Overview <span class="sr-only">(current)</span></a></li>
        <li><a href="/admin/create">Create<span class="sr-only">(current)</span></a></li>
    </ul>

    <ul class="nav nav-sidebar">
        @foreach($archive as $date)
            <li><a href="?month={{$date['month']}}&year={{$date['year']}}">{{$date['year'] . ' ' . $date['month']}}</a></li>
        @endforeach
    </ul>

    <script>
        var link = 'a[href="' + window.location.pathname + '"]';
        $('li').attr('class', '');
        $(link).parent('li').attr('class', 'active'); 
    </script>

</div>