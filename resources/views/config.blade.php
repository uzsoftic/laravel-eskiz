@extends('vendor.laravel-eskiz.layouts.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Configuration</li>
        </ol>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-wrench"></i> Configuration</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ url()->current() }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputProtocol">Protocol</label>
                                    <select id="inputProtocol" name="server_protocol" class="form-control">
                                        <option value="https" @if($config?->server_protocol == 'https') selected @endif >https://</option>
                                        <option value="http" @if($config?->server_protocol == 'http') selected @endif >http://</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="inputHost">Host</label>
                                    <input type="text" name="server_host" class="form-control" id="inputHost" placeholder="notify.eskiz.uz/api" value="{{ $config?->server_host ?? 'notify.eskiz.uz/api' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAlpha">Alpha name</label>
                                <input type="text" name="alpha_name" class="form-control" id="inputAlpha" aria-describedby="helpAlpha" placeholder="Alpha name" value="{{ $config?->alpha_name }}">
                                <small id="helpAlpha" class="form-text text-muted">If you don't have an alpha name, leave it blank!</small>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputApiLogin">API Login *</label>
                                    <input type="text" name="api_login" class="form-control" id="inputApiLogin" placeholder="API Login" value="{{ $config?->api_login }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputApiPassword">API Password *</label>
                                    <input type="text" name="api_password" class="form-control" id="inputApiPassword" placeholder="API Password" value="{{ $config?->api_password }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSmsEmail">SMS Email *</label>
                                    <input type="text" name="sms_email" class="form-control" id="inputSmsEmail" placeholder="SMS Email" value="{{ $config?->sms_email }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputSmsPassword">SMS Password *</label>
                                    <input type="text" name="sms_password" class="form-control" id="inputSmsPassword" placeholder="SMS Password" value="{{ $config?->sms_password }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputApiToken">API Token</label>
                                <input type="text" name="token" class="form-control" id="inputApiToken" aria-describedby="helpToken" placeholder="Token" value="{{ $config?->token }}" readonly>
                                <small id="helpToken" class="form-text text-muted">Updated: {{ $config ? date('d.m.Y H:i:s', strtotime($config->token_updated_at)) : 'token not generated' }}</small>
                            </div>

                            <div class="row justify-content-end">
                                <button type="button" class="btn btn-danger m-1"><i class="fa fa-refresh"></i> Generate Token</button>
                                <button type="submit" name="submit" value="true" class="btn btn-success m-1"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
