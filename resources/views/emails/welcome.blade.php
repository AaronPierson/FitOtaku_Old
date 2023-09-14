@component('mail::message')
# Welcome to Fit Otaku!

{{-- Dear {{ $user->name }}, --}}

## We are thrilled to have you as a member of Fit Otaku! 

Our mission is to help people like you achieve their fitness goals while having fun with like-minded people.

To get started, please log in to your account using the email address and password you provided when you signed up. 
If you have any trouble logging in or have any questions, please don't hesitate to contact our customer support team at support@fitotaku.com.

Thank you again for joining Fit Otaku! We can't wait to see all the amazing progress you'll make!

@component('mail::button', ['url' => 'https://fitotaku.com/login'])
Get Started
@endcomponent

Sincerely,<br>
The {{ config('app.name') }} Team
@endcomponent

