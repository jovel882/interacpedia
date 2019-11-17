@extends('adminlte::page')

@section('title', __('page.companies.title'))

@section('content_header')
    <h1><i class="fa fa-fw fa-building"></i> {{__("page.companies.header")}}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body" style="">
            <table id="tbl_view" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            {{__("page.companies.table.id")}}
                        </th>
                        <th>
                            {{__("page.companies.table.name")}}
                        </th>
                        <th>
                            {{__("page.companies.table.email")}}
                        </th>
                        <th>
                            {{__("page.companies.table.website")}}
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
                    @foreach ($companies as $company)
                        <tr>
                            <td>
                                {{$company->id}}
                            </td>
                            <td>
                                {{$company->name}}
                            </td>
                            <td>
                                {{$company->email}}
                            </td>
                            <td>
                                {{$company->website}}
                            </td>
                            <td>
                                {{$company->created_at}}
                            </td>
                            <td>
                                {{$company->updated_at}}
                            </td>
                            <td>
                                {{$company->deleted_at}}
                            </td>
                            <td>
                                @if (!$company->trashed())
                                    <a name="btn_edit" id="btn_edit" href="{{route('companies.edit', ['lang' => app()->getLocale(),'company' => $company->id])}}" class="btn btn-info">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    
                                    <a name="btn_delete" id="btn_delete" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" data-id="{{$company->id}}" data-name="{{ $company->name}}" >
                                        <i class="fa fa-trash"></i> Eliminar
                                    </a>                                    
                                @else

                                    {{-- <a name="btn_restore" id="btn_restore" href="{{route('order-restore', ['id' => $company->id])}}" class="btn bg-olive">
                                        <i class="fa fa-history"></i> Retaurar
                                    </a>                                     --}}
                                @endif

                                <a name="btn_view" id="btn_view" href="{{route('companies.show',['lang' => app()->getLocale(),'company'=>$company->id])}}" target="_blank" class="btn btn-warning">
                                    <i class="fa fa-eye"></i> Ver
                                </a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align:center;">
                            {{ $companies->links() }}    
                        </td>
                    </tr>
                </tfoot>
            </table>            
        </div>
    </div>
@stop
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            tbl_view=$('#tbl_view').DataTable({
                "processing": true,
                "language": {!! __("page.general.dataTableLang") !!},                
                "columnDefs": [ 
                    {
                        "className": "text-center", 
                        "targets": "_all"
                    },
                    {
                        "targets": [ 7 ],
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