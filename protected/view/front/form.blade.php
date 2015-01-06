{{Form::Start(array('router'=>'form', 'method' => 'get', 'file' => true), array('class'=>'formWrapper', 'id'=>'forms'))}}<br>
{{Form::Input(array('name' => 'username','value'=>'Username'),array('class'=>'1'))}}<br>
{{Form::Radio(array('name' => 'gender','value'=>'Male'),array('class'=>'1'))}} male
{{Form::Radio(array('name' => 'gender','value'=>'Female'),array('class'=>'1'))}} female <br>
{{Form::Checkbox()}}
{{Form::Password(array('name' => 'password','value'=>'Password'))}}<br>
{{Form::Hidden(array('name'=>'asdasdasd','value'=>'sdasdasdas'))}}<br>
{{Form::Teaxtarea(array('value'=>'print your name', 'name'=>'address'), array('style'=>'color: red;'))}}<br>
{{Form::File(array('name'=>'img'))}} <br>
{{Form::Submit(array('value'=>'send kon'), array("onclick"=>"alert('Hello World!')"))}} </br>
{{Form::Select('age', [18,14,25,14,12,25,148])}} </br>
{{Form::Select('age',  array(
                        'Happy' => array('asdasdas'=>'pedram', '5454', 'Ecstatic'),
                        'Sad' => array('Bereaved', 'Pensive', 'Down'),))
                        }} </br>


{{Form::End()}}



