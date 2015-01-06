Hello World
<h3> Glob </h3>
<hr/>
<pre>
@foreach($glob as $gb)
<a href='{{$gb}}'> {{File::Name($gb)}} </a>
@endforeach


</pre>