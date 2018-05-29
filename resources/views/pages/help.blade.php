@extends('layouts.app')

@include('partials.submitQuestModal')

@section('content')

<h3>What is our drive?</h3>
<p>Our mission is to share and grow the world’s knowledge. A vast amount of the knowledge that would be valuable to many people is currently only available to a few — either locked in people’s heads, or only accessible to select groups. We want
to connect the people who have knowledge to the people who need it, to bring together people with different perspectives so they can understand each other better, and to empower everyone to share their knowledge for the benefit of the rest
of the world.</p>
</br>
<h3>How can I submit a question?</h3>
<p>In almost every page of our site in the upper right corner below the navbar you have a Submit Question button :) (Remember you have to have an account and be logged in to post)</p>
</br>
<h3>How can I submit an answer?</h3>
<p>If you're in the page of a question in the upper right corner below the navbar you have a Submit Answer button :) (Remember you have to have an account and be logged in to post)</p>
</br>
<h3>How can I create an account?</h3>
<p>You can create and accout <a href="{{ route('register') }}">here</a> :)</p>
</br>
<h3>How can log in to an account?</h3>
<p>You can create and accout <a href="{{ route('login') }}">here</a> :) or in any of our pages in the upper right corner</p>
</br>
<h3>I cant remeber my password</h3>
<p>You can create reset your password <a href="{{ route('password.request') }}">here</a> :) </p>

@endsection