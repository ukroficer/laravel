
        @extends('main')

	 @section('content')
			<div class="row">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="text-center">
						{{$name}}
					</h1>
					
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3 form_row">
						<?=Form::open();?>
						<div class="form-inline text-center">
						  	<div class="form-group">
						    	<?=Form::text('name', $tag->name, array('class' => 'form-control'));?>
						  	</div> 
						  	<?=Form::submit('Click Me!', array('class' => 'btn btn-primary'));?>
				 
						
		    				
						</div>
						<?=Form::close();?>
					</div>

					<ul class="tag_list">
						<?php foreach($tags as $k=>$v ):?>
                         <li class="btn btn-default">
							<span class="tag_text">
								<?=$v->name;?>
							</span>
							<a href="<?=URL::to('tags/edit/'.$v->id);?>" class="glyphicon glyphicon-edit"></a>
							<a href="<?=URL::to('tags/delete/'.$v->id);?>" class="glyphicon glyphicon-remove delete_tag"></a>
					  	</li>
						<?php endforeach;?>
					</ul>

				</div>

			</div>
@endsection
		
