
<form action="/police_agent/add" method="post" enctype="multipart/form-data">
    Name:
    <input name="police_name"><br>
Position
    <input name="police_position"><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit"  name="submit" value="Add">
</form>
