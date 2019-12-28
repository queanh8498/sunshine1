<div style="background-color: #DAE8FC; text-align: center; ">
        <h1>HELLO </h1> 
    </div>

    {{--comment neeeee`--}}
    Ten ban la: <span style="color:red"> @{{ $hotentrongview }} </span>

    <ul>
    @foreach($dataLoai as $item)
    <li>
    {{ $item->l_ten }} - {{ $item->l_trangThai == 2 ? 'kha dung' : 'khoa' }}
    </li>
    @endforeach
    </ul>