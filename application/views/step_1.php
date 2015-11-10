      <div class="big-forma">
        <div class="div-head-form">
          <span>Step One</span>
          <p>Start by giving us all your personal data</p>
        </div>
        <div class="root-form">
         <?=form_open('main/add_step_1');?>
            <div class="input-text-init">
              <div>
                <label>First Name</label>
                <?=form_input('first_name');?>
              </div>
              <div>
                <label>Last Name</label>
                <?=form_input('last_name');?>
              </div>
              <div>
                <label>Email address</label>
                <?=form_input('email');?>
              </div>
              <div>
                <label>birthday</label>
                 <?=form_input('birthday','','id="typedate"');?>
                
              </div>
              <div>
                <label>Shoe size</label>
                <?=form_input('size');?>
              </div>
            </div>
            <div class="button-succes">
              <button type="submit">SAVE</button>
            </div>
          <?=form_close();?>
        </div>
      </div>