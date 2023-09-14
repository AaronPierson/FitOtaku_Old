@component('mail::message')
# Thanks for contacting us!

Dear {{ $name }},

Thank you for submitting your question to us. Our team will review your message and get back to you as soon as possible.

If you have any further questions or concerns, please don't hesitate to contact us again at support@fitotaku.com.

Thank you for your patience and understanding!

Sincerely,<br>The {{ config('app.name') }} Team

---

#### Message Details:

**From:** {{ $email }}

**Message:** {{ $message }}

@endcomponent



{{-- rice 200 Cal 4.8 oz
bell 200 cal 6.5 oz
beef tips 228 cal 4 oz cal 456 --}}