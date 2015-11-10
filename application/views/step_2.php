         <div class="big-forma step-2">

         <div class="div-head-form">

          <span>Step Two</span>

          <p>Take this survey so we can learn about you</p>

         </div>

         <div class="root-form">

          <?=form_open('/main/add_step_2');?>

            <div class="input-text-init">

              <div>

                <label>What is Your Favorite Ice cream?</label>

                <?=form_input('ice_cream');?>

              </div>

              <div>

                <label>Who is your favorite superhero?</label>

                <?=form_input('superhero');?>

              </div>

              <div>

                <label>Who is your favorite movie star?</label>

                <?=form_input('movie_star');?>

              </div>

              <div>

                <label>when do you think the world will end?</label>

                <?=form_input('end','','id="typedate"');?>

              </div>

              <div>

                <label>Who will win the super bowl this year?</label>

                <?=form_input('super_bowl');?>

              </div>

            </div>

            <?=form_hidden('user_id',$user_id);?>

            <div class="button-succes">

              <button type="submit">SAVE</button>

            </div>

          <?=form_close();?>

          </div>

       </div>