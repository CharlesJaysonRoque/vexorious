@extends('welcome')

@section('title', '500 - Server Creeper Explosion | Vexorious SMP')

@section('content')
<style>
    .error-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 90px 20px;
        min-height: 60vh;
    }

    .error-box {
        background-color: #141414;
        border: 4px solid #000000;
        border-radius: 12px;
        box-shadow: inset -4px -4px 0px #0a0a0a, inset 4px 4px 0px #2e2e2e, 0 12px 35px rgba(0, 0, 0, 0.8);
        padding: 50px 30px;
        max-width: 600px;
        width: 100%;
        text-align: center;
    }

    .error-code {
        font-size: 5rem;
        color: #ff9900;
        text-shadow: 4px 4px 0px #000;
        margin: 0;
        line-height: 1;
    }

    .error-title {
        font-size: 1.8rem;
        color: #ffffff;
        text-shadow: 2px 2px 0px #000;
        margin: 15px 0;
        text-transform: uppercase;
    }

    .error-desc {
        font-size: 1.1rem;
        color: #aaaaaa;
        margin-bottom: 30px;
        line-height: 1.5;
    }

    .btn-return {
        background-color: var(--main-color);
        color: #ffffff !important;
        padding: 12px 28px;
        border: 3px solid #000000;
        box-shadow: inset -3px -3px 0px #005c29, inset 3px 3px 0px #4dff88;
        text-shadow: 2px 2px 0px #000;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        transition: all 0.15s ease;
    }

    .btn-return:hover {
        background-color: #00b350;
        transform: scale(1.05);
    }
</style>

<div class="error-container">
    <div class="error-box">
        <h1 class="error-code">500</h1>
        <h2 class="error-title">A Creeper Blew Up The Server</h2>
        <p class="error-desc">
            Something unexpected went wrong on our end. Our server redstone engineers are repairing the damage!
        </p>
        <a href="{{ route('home') }}" class="btn-return">Return to Safety</a>
    </div>
</div>
@endsection
