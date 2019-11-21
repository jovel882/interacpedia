@extends('adminlte::page')

@section('title', __('page.employees.title'))
@push('css')
    <style>
        .btn{
            margin: 0.8em 0px;
        }
    </style>        
@endpush
@section('content_header')
    <h1><i class="fa fa-fw fa-users"></i> {{__("page.employees.header")}}</h1>
@stop

@section('content')
    @if(session('create'))
        <div class="alert alert-success alert-dismissible fade in" role="alert"> <button type="button" class="close btn_error" data-dismiss="alert" aria-label="cerrar" ><i class="fa fa-fw fa-times-circle"></i></button>
            <i class="fa fa-fw fa-plus-circle"></i> {{session('create')}}
        </div>    
    @endif
    @if(session('update'))
        <div class="alert alert-info alert-dismissible fade in" role="alert"> <button type="button" class="close btn_error" data-dismiss="alert" aria-label="cerrar" ><i class="fa fa-fw fa-times-circle"></i></button>
        <i class="fa fa-fw fa-sync"></i> {{session('update')}}
        </div>    
    @endif
    @if(session('delete'))
        <div class="alert alert-warning alert-dismissible fade in" role="alert"> <button type="button" class="close btn_error" data-dismiss="alert" aria-label="cerrar" ><i class="fa fa-fw fa-times-circle"></i></button>
            <i class="fa fa-fw fa-ban"></i> {{session('delete')}}
        </div>    
    @endif
    @if(count( $errors ) > 0)
        <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close btn_error" data-dismiss="alert" aria-label="Cerrar" ><i class="fa fa-fw fa-times-circle"></i></button>
            @foreach ($errors->all() as $error)
                <div style="margin-bottom: 1em;">
                    <i class="fa fa-fw fa-exclamation-triangle"></i> {{ $error }}
                </div>
            @endforeach
        </div>                
    @endif        
    <div class="box">
        <div class="box-body">
            @if (auth()->user()->can('EmployeesCreate'))
                <div class="row">
                    <div class="col-md-12">
                        <a name="btn_edit" id="btn_edit" href="{{route('employees.create', ['lang' => app()->getLocale()])}}" class="btn btn-success">
                            <i class="fa fa-plus"></i> {{__("page.general.create")}}
                        </a>                    
                    </div>
                </div>
            @endif
            <table id="tbl_view" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            {{__("page.employees.table.id")}}
                        </th>
                        <th>
                            {{__("page.employees.table.first_name")}}
                        </th>
                        <th>
                            {{__("page.employees.table.last_name")}}
                        </th>
                        <th>
                            {{__("page.employees.table.email")}}
                        </th>
                        <th>
                            {{__("page.employees.table.phone")}}
                        </th>
                        <th>
                            {{__("page.employees.table.company")}}
                        </th>
                        <th>
                            {{__("page.general.createDate")}}
                        </th>
                        <th>
                            {{__("page.general.updateDate")}}
                        </th>
                        <th>
                            {{__("page.general.deleteDate")}}
                        </th>
                        <th>
                            {{__("page.general.actions")}} <i class="fa fa-fw fa-cogs"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>
                                {{$employee->id}}
                            </td>
                            <td>
                                {{$employee->first_name}}
                            </td>
                            <td>
                                {{$employee->last_name}}
                            </td>
                            <td>
                                {{$employee->email}}
                            </td>
                            <td>
                                {{$employee->phone}}
                            </td>
                            <td>
                                {{$employee->company->name??__("page.general.empty")}}
                            </td>
                            <td>
                                {{$employee->created_at}}
                            </td>
                            <td>
                                {{$employee->updated_at}}
                            </td>
                            <td>
                                {{$employee->deleted_at}}
                            </td>
                            <td>
                                @if (!$employee->trashed())
                                    @if (auth()->user()->can('EmployeesEdit'))
                                        <a name="btn_edit" id="btn_edit" href="{{route('employees.edit', ['lang' => app()->getLocale(),'company' => $employee->id])}}" class="btn btn-info">
                                            <i class="fa fa-edit"></i> {{__('page.general.edit')}}
                                        </a>
                                    @endif
                                    @if (auth()->user()->can('EmployeesDelete'))
                                        <a name="btn_delete" id="btn_delete" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-url="{{route('employees.destroy',['lang' => app()->getLocale(),'company'=>$employee->id])}}" data-name="{{ $employee->full_name}}" >
                                            <i class="fa fa-minus-circle"></i> {{__('page.general.delete')}}
                                        </a>                                    
                                    @endif
                                @endif
                                @if (auth()->user()->can('EmployeesView'))
                                    <a name="btn_view" id="btn_view" href="{{route('employees.show',['lang' => app()->getLocale(),'company'=>$employee->id])}}" target="_blank" class="btn btn-warning">
                                        <i class="fa fa-eye"></i> {{__('page.general.view')}}
                                    </a> 
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align:center;">
                            {{ $employees->links() }}    
                        </td>
                    </tr>
                </tfoot>
            </table>            
        </div>
    </div>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="box box-solid box-nborder">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fw fa-times-circle"></i></button>
                        <h4 class="modal-title"><i class="fa fa-minus-circle"></i> {{__("page.employees.delete.title")}}</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <form name="frm_company" id ="frm_company" class="form-horizontal" action="" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn_remove btn_DeleConf"><i class="fa fw fa-minus-circle"></i> {{__('page.general.delete')}}</button>
                            <button type="button" class="btn btn-outline pull-left btn_Close" data-dismiss="modal"><i class="fa fw fa-ban"></i> {{__('page.general.cancel')}}</button>
                        </form>
                    </div>
                </div>
                <div class="overlay">
                    <i class="fa fa-circle-o-notch fa-spin"></i>
                </div>                
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>    
@stop
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#modal-danger').find(".overlay").hide();
            $(".btn-danger").click(function(){                
                $(".modal-body").html('<p> <i class="fa fw fa-exclamation-circle"></i> {{__("page.employees.delete.msg")}} "'+$(this).data("name")+'" ?</p>');
                $('#frm_company').attr('action', $(this).data("url"));
            });            
            $(".btn_DeleConf").click(function(){                
                $('#modal-danger').find(".overlay").show();
                return true;                                                
            });            
            tbl_view=$('#tbl_view').DataTable({
                "processing": true,
                "language": {!! __("page.general.dataTableLang") !!},                
                "columnDefs": [ 
                    {
                        "className": "text-center", 
                        "targets": "_all"
                    },
                    {
                        "targets": [ 9 ],
                        "orderable": false,
                    },                    
                ],
                "order": [0,"asc"],
                "scrollX": true,
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,                
            });        
        });        
    </script>
@endpush