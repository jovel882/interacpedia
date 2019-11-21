@extends('adminlte::page')

@section('title', __('page.employees.'.(isset($employee)?'edit':'add').'.title'))
@push('css')       
@endpush
@section('content_header')
    <h1><i class="fa fa-fw fa-users"></i> {{__('page.employees.'.(isset($employee)?'edit':'add').'.header')}}</h1>
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
    <form name="frm_employee" id ="frm_employee" class="form-horizontal" action="{{isset($employee)?route('employees.update',['lang' => app()->getLocale(),'company'=>$employee->id]):route('employees.store',['lang' => app()->getLocale()])}}" method="post">
        @if (isset($employee))
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{$employee->id}}" />
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
                            <label class="col-sm-4 control-label">{{__('page.employees.first_name.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.first_name.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="text" required name="first_name" id="first_name" class="form-control" placeholder="{{__('page.employees.first_name.place')}}" value="{{old('first_name')??$employee->first_name??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.employees.last_name.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.last_name.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="text" required name="last_name" id="last_name" class="form-control" placeholder="{{__('page.employees.last_name.place')}}" value="{{old('last_name')??$employee->last_name??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                                                    
                </div>                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.employees.email.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.email.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="email" name="email" id="email" class="form-control" placeholder="{{__('page.employees.email.place')}}" value="{{old('email')??$employee->email??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.employees.phone.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.phone.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <input type="tel" name="phone" id="phone" pattern="\+?[1-9]\d{1,14}" class="form-control" placeholder="{{__('page.employees.phone.place')}}" value="{{old('phone')??$employee->phone??""}}" />
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                                        
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">{{__('page.employees.company.label')}} <i class="text-light-blue fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="{{__('page.employees.company.tooltip')}}"></i>:</label>                        
                            <div class="col-sm-8">
                                <select name="company_id" id="company_id">
                                    <option value="">{{__("page.companies.selectOpcion")}}</option>
                                    @foreach ($companies as $company)
                                        <option {{((null!==old('company_id') && old('company_id')==$company->id) || (isset($employee) && old('company_id')===null && $employee->company && $employee->company->id==$company->id))?'selected="selected"':''}} value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>                    
                    </div>                                                    
                </div>                
            </div>
            <div class="box-footer">
                <a type="button" class="btn btn-danger" id="btn_cancel" href="{{ route("employees.index",['lang' => app()->getLocale()]) }}"><i class="fa fa-fw fa-times"></i> {{__('page.general.cancel')}}</a>
                <button type="submit" class="btn btn-success pull-right" id="btn_enviar"><i class="fa fa-fw fa-save"></i> {{isset($employee)?__('page.general.edit'):__('page.general.create')}}</button>
            </div>            
        </div>
    </form>
@stop
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#company_id').select2({
                width: '100%',
            });                                
        });        
    </script>
@endpush