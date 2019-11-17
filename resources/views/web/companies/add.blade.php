@extends('adminlte::page')

@section('title', __('page.companies.'.(isset($company)?'edit':'add').'.title'))
@push('css')       
@endpush
@section('content_header')
    <h1><i class="fa fa-fw fa-building"></i> {{__('page.companies.'.(isset($company)?'edit':'add').'.header')}}</h1>
@stop

@section('content')
    @if(count( $errors ) > 0)
        <div class="alert alert-danger alert-dismissible fade in" role="alert"> <button type="button" class="close btn_error" data-dismiss="alert" aria-label="Cerrar" ><i class="fa fa-fw fa-times-circle"></i></button>
            @foreach ($errors->all() as $error)
                <div style="margin-bottom: 1em;">
                    <i class="fa fa-fw fa-warning"></i> {{ $error }}
                </div>
            @endforeach
        </div>                
    @endif  
    <form name="frm_company" id ="frm_company" class="form-horizontal" action="{{isset($company)?route('companies.update',['lang' => app()->getLocale(),'company'=>$company->id]):route('companies.store',['lang' => app()->getLocale()])}}" enctype="multipart/form-data" method="post">
        @if (isset($company))
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{$company->id}}" />
        @endif
        {{ csrf_field() }}    
        <div class="box">
            <div class="box-body" style="">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="text-cente">{{__('page.general.titleRequired')}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.companies.name.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.name.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="text" required name="name" id="name" class="form-control" placeholder="{{__('page.companies.name.place')}}" value="{{old('name')??$company->name??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.companies.email.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.email.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{__('page.companies.email.place')}}" value="{{old('email')??$company->email??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                
                </div>                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.companies.logo.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.logo.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                @if (isset($company) && empty($company->logo)===false)
                                    <img src="{{$company->logo}}" class="img-responsive" style="margin: 1em;"/>
                                @endif
                                <input type="file" name="logo" id="logo" class="form-control" placeholder="" value="" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.companies.website.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.website.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="url" name="website" id="website" class="form-control" placeholder="{{__('page.companies.website.place')}}" value="{{old('website')??$company->website??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                
                </div>                
            </div>
            <div class="box-footer">
                <a type="button" class="btn btn-danger" id="btn_cancel" href="{{ route("companies.index",['lang' => app()->getLocale()]) }}"><i class="fa fa-fw fa-times"></i> {{__('page.general.cancel')}}</a>
                <button type="submit" class="btn btn-success pull-right" id="btn_enviar"><i class="fa fa-fw fa-save"></i> {{isset($company)?__('page.general.edit'):__('page.general.create')}}</button>
            </div>            
        </div>
    </form>
@stop
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
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