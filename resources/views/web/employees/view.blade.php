@extends('adminlte::page')

@section('title', __('page.employees.view.title'))
@push('css')       
@endpush
@section('content_header')
    <h1><i class="fa fa-fw fa-users"></i> {{__('page.employees.view.header')}}</h1>
@stop

@section('content')      
    <div class="box">
        <div class="box-body form-horizontal" style="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.employees.first_name.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.first_name.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">                            
                            <p class="text-muted">{{$employee->first_name}}</p>
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.employees.last_name.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.last_name.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">                            
                            <p class="text-muted">{{$employee->last_name}}</p>
                        </div>
                    </div>                    
                </div>                                                                
            </div>                              
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.employees.email.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.email.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">                            
                            <p class="text-muted">{{$employee->email}}</p>
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.employees.phone.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.phone.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">                            
                            <p class="text-muted">{{$employee->phone}}</p>
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.employees.company.title')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.company.tooltip')}}"></i>:</label>                        
                        <div class="col-sm-8">                            
                            <p class="text-muted">{{$employee->company->name??__("page.general.empty")}}</p>
                        </div>
                    </div>                    
                </div>                
            </div>                              
            <div class="row">                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.general.createDate')}}:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted">{{$employee->created_at??__("page.general.empty")}}</p>                            
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.general.updateDate')}}:</label>                        
                        <div class="col-sm-8">
                            <p class="text-muted">{{$employee->updated_at??__("page.general.empty")}}</p>                            
                        </div>
                    </div>                    
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">{{__('page.general.deleteDate')}}:</label>                        
                        <div class="col-sm-8">
                            @if ($employee->deleted_at)
                                <h4 class="text-red"><strong>{{$employee->deleted_at}}</strong></h4>
                            @else
                                <p class="text-muted">{{__("page.general.empty")}}</p>
                            @endif
                        </div>
                    </div>                    
                </div>                
            </div>                
        </div>
        <div class="box-footer">
            <a type="button" class="btn btn-danger" id="btn_cancel" href="{{ route("employees.index",['lang' => app()->getLocale()]) }}"><i class="fa fa-fw fa-times"></i> {{__('page.general.cancel')}}</a>
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