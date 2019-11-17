@extends('adminlte::page')

@section('title', __('page.companies.view.title'))
@push('css')       
@endpush
@section('content_header')
    <h1><i class="fa fa-fw fa-building"></i> {{__('page.companies.view.header')}}</h1>
@stop

@section('content')      
    <div class="box">
        <div class="box-body" style="">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.companies.name.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.name.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">                            
                            <p class="text-muted">{{$company->name}}</p>
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.companies.email.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.email.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted">{{$company->email??__("page.general.empty")}}</p>                            
                        </div>
                    </div>                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.companies.website.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.website.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted">{{$company->website??__("page.general.empty")}}</p>                            
                        </div>
                    </div>                    
                </div>                                
            </div>                
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.companies.logo.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.companies.logo.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted font-weight-bold"><strong>{{$company->logo??__("page.general.empty")}}</strong></p>                            
                            @if (isset($company) && empty($company->logo)===false)
                                <img src="{{$company->logo}}" class="img-responsive" style="margin: 1em;"/>
                            @endif
                        </div>
                    </div>                    
                </div>                
                                
            </div>                
            <div class="row">                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.general.createDate')}}:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted">{{$company->created_at??__("page.general.empty")}}</p>                            
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.general.updateDate')}}:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted">{{$company->updated_at??__("page.general.empty")}}</p>                            
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.general.deleteDate')}}:</label>                        
                        <div class="col-sm-8">
                            @if ($company->deleted_at)
                                <h4 class="text-red"><strong>{{$company->deleted_at}}</strong></h4>
                            @else
                                <p class="text-muted">{{__("page.general.empty")}}</p>
                            @endif
                        </div>
                    </div>                    
                </div>                
            </div>                
        </div>
        <div class="box-footer">
            <a type="button" class="btn btn-danger" id="btn_cancel" href="{{ route("companies.index",['lang' => app()->getLocale()]) }}"><i class="fa fa-fw fa-times"></i> {{__('page.general.cancel')}}</a>
        </div>            
    </div>
@stop
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });        
    </script>
@endpush