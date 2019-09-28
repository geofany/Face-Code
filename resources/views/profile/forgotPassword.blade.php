<form method="post" action="{{url('/setToken')}}">

{{csrf_field()}}
<input type="text" name="email_address">
<input type="submit" value="send reset link">
</form>
