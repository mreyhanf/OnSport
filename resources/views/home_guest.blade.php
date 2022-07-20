@extends('layouts.tabs')

@section('title', 'Home • OnSport')

@section('stylehighlighttab_home', 'background-color: #d6d6d6')
@section('activenav_home', 'active')
@section('stylecolortext_home', 'black')
@section('stylecolortext_myevents', 'white')
@section('stylecolortext_browse', 'white')
@section('stylecolortext_notifications', 'white')
@section('stylecolortext_profile', 'white')

@section('content')

<div class="container">

    <div class="alert alert-warning" role="alert" style="text-align: center; background:rgb(255, 238, 183)">
        <strong>You need to log in first to see your active events and get recommendations. In the mean time, you can go to <span style="background: rgb(255, 174, 0); color: black">Browse</span> to explore all active events.</strong>
    </div>

    <div class="row mb-4">
        <div class="col-sm-12 col-md-8 col-lg-10">
            <h3 style="padding: 8px; font-weight: bold; margin-bottom: 0px">Active Events</h3>
        </div>
    </div>

    <div>
        <h4 style="padding: 8px; font-weight: bold;">Created</h4>

    <div class="d-flex justify-content-center">
        <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">Log in to see your active events</span>
    </div>
    </div>

    <div>
        <h4 style="padding: 8px; font-weight: bold;">Joined</h4>

        <div class="d-flex justify-content-center">
            <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">Log in to see your active events</span>
        </div>
    </div>

<hr>

<div>
    <h3 style="padding: 8px; font-weight: bold ">Recommendations</h3>

    <div class="d-flex justify-content-center">
        <span class="p-4" style="font-size: 20px; color: rgb(88, 88, 88)">Log in to get event recommendations</span>
    </div>
</div>

</div>

<script>
    const collection_card_title = document.getElementsByClassName("card-title");
    for (let i = 0; i < collection_card_title.length; i++) {
        collection_card_title[i].addEventListener('mouseover', event => {
            const {target} = event;
            mouseoverChild(target);
        });

        collection_card_title[i].addEventListener('mouseout', event => {
            const {target} = event;
            mouseoutChild(target);
        });

        function mouseoverChild(element){
            element.style.color = 'rgb(0, 89, 206)';
        }

        function mouseoutChild(element){
            element.style.color = 'rgb(29, 153, 255)';
        }
    }
</script>

@endsection

