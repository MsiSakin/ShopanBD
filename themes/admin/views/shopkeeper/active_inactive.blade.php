<?php $i = 1?>
    @foreach($shopkeepers as $row)
        <tr>
            <td style="text-align:center">{{$i++}}</td>
            <td style="text-align:center">{{$row->name}}</td>
            <td style="text-align:center">{{$row->email}}</td>
            <td style="text-align:center">{{$row->phone}}</td>
            <td style="text-align:center">{{$row->varified_at}}</td>
            <td style="text-align:center">{{$row->description}}</td>
            <td style="text-align:center">
                
                @if($row->status == 0)
                <a href="javascript:;"><span class="badge badge-danger active" record="inactive" recordid="{{$row->id}}">INACTIVE</span></a>
                    @else
                    <a href="javascript:;"><span class="badge badge-success" id="{{ $row->id }}">ACTIVE</span></a>
                @endif
                
            </td>
            <td style="text-align:center">
                <form method="post" action="{{ url('/admin/percentage-update/'.$row->id) }}">
                    @csrf
                    <input type="text" name="percentage_value" value="{{$row->percentage}}">&nbsp;&nbsp;
                    <button type="submit" class="btn btn-info btn-sm">
                        <i class="fas fa-edit"></i>
                    </button>
                </form>
                
            </td>
            
            
            <td style="text-align:center">
                <a href="javascript:;" class="btn btn-sm btn-danger sa-delete" record="shopkeepers" recordid="{{$row->id}}" title="Delete" style="margin-left: 15px">Delete&nbsp;<i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
    @endforeach