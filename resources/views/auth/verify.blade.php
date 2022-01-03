@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifiez votre adresse e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un e-mail de vérification vient de vous avoir été envoyé.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, consultez vos e-mails pour le lien de vérification') }}
                    {{ __('Si vous n\'avez pas reçu d\'e-mails') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour recevoir un nouveau lien.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
