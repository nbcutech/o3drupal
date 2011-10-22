  <form id="cookstr-search-form" action="/foodies/recipes/search" method="get">

  <h3>Search:</h3>
  <input type="submit" value="GO" class='recipe-search'/>
  <input type="text" name="st" value="" class='recipe-text'/>
  <h3>Refine or Browse:</h3>
  <p class='refine-instructions'>Make selections, then <a href='#' class='refine-submit-link'>click here</a></p>

  
    <ul class='top-level'>
      <li>
        <a href="#" id="cookstr-clear-search-link">Start a fresh search.</a>
      </li>
      
        <li class="cookstr-search-field" name="cost" search-key="cost">
          
            <div class="cookstr-field-name">
              <a href="#">Cost</a>
            </div>
            <div class="cookstr-form-element">
              <select name="cost">
                
                
                <option value="">Any</option>
<option value="1">Inexpensive</option>
<option value="2">Moderate</option>
<option value="3">Splurge</option>
              </select>
            </div>
          
        </li>
      
        <li class="cookstr-search-field" name="skill_level" search-key="skl">
          
            <div class="cookstr-field-name">
              <a href="#">Skill level</a>
            </div>
            <div class="cookstr-form-element">
              <select name="skl">
                
                
                <option value="">Any</option>
<option value="1">Easy</option>
<option value="2">Moderate</option>
<option value="3">Challenging</option>
              </select>
            </div>
          
        </li>
      
        <li class="cookstr-search-field" name="total_time" search-key="tot">
          
            <div class="cookstr-field-name">
              <a href="#">Total time</a>
            </div>
            <div class="cookstr-form-element">
              <select name="tot">
                
                
                <option value="">Any</option>
<option value="1">Under 15 minutes</option>
<option value="2">Under 30 minutes</option>
<option value="3">Under 1 hour</option>
<option value="4">Under 2 hours</option>
<option value="5">Under 4 hours</option>
<option value="6">Half-day</option>
<option value="7">A day or more</option>
              </select>
            </div>
          
        </li>
      
        <li class="cookstr-search-field" name="make_ahead" search-key="mak">
          
            <input type="checkbox" name="mak" value="Yes" alt="No" id="cookstr-make-ahead" />
            <label for="cookstr-make-ahead">Make Ahead</label>
          
        </li>
      
        <li class="cookstr-search-field" name="child_friendly" search-key="chi">
          
            <input type="checkbox" name="chi" value="Yes" alt="No" id="cookstr-child-friendly" />
            <label for="cookstr-child-friendly">Kid Friendly</label>
          
        </li>
      
        <li class="cookstr-search-field" name="five_ingredients_or_less" search-key="fiv">
          
            <input type="checkbox" name="fiv" value="Yes" alt="No" id="cookstr-five-ingredients-or-less" />
            <label for="cookstr-five-ingredients-or-less">Five Ingredients or Less</label>
          
        </li>
      
        <li class="cookstr-search-field" name="one_pot" search-key="one">
          
            <input type="checkbox" name="one" value="Yes" alt="No" id="cookstr-one-pot" />
            <label for="cookstr-one-pot">One Pot</label>
          
        </li>
      

      
        
        <li class="cookstr-search-field" name="holiday" search-key="hol">
          <div class="cookstr-field-name">
            <a href="#">Holiday</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1277" name="hol[]" type="checkbox" value="New Year" />
                  <label for="cookstr-checkbox-1277">New Year</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1266" name="hol[]" type="checkbox" value="Chinese New Year" />
                  <label for="cookstr-checkbox-1266">Chinese New Year</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1283" name="hol[]" type="checkbox" value="Valentines Day" />
                  <label for="cookstr-checkbox-1283">Valentines Day</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1275" name="hol[]" type="checkbox" value="Mardi Gras/Carnival" />
                  <label for="cookstr-checkbox-1275">Mardi Gras/Carnival</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1281" name="hol[]" type="checkbox" value="St. Patrick's Day" />
                  <label for="cookstr-checkbox-1281">St. Patrick's Day</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1278" name="hol[]" type="checkbox" value="Passover" />
                  <label for="cookstr-checkbox-1278">Passover</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1270" name="hol[]" type="checkbox" value="Easter" />
                  <label for="cookstr-checkbox-1270">Easter</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1268" name="hol[]" type="checkbox" value="Cinco de Mayo" />
                  <label for="cookstr-checkbox-1268">Cinco De Mayo</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1276" name="hol[]" type="checkbox" value="Mothers' Day" />
                  <label for="cookstr-checkbox-1276">Mothers' Day</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1272" name="hol[]" type="checkbox" value="Fathers' Day" />
                  <label for="cookstr-checkbox-1272">Fathers' Day</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1264" name="hol[]" type="checkbox" value="4th of July" />
                  <label for="cookstr-checkbox-1264">4th Of July</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1279" name="hol[]" type="checkbox" value="Ramadan" />
                  <label for="cookstr-checkbox-1279">Ramadan</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1280" name="hol[]" type="checkbox" value="Rosh Hashanah" />
                  <label for="cookstr-checkbox-1280">Rosh Hashanah</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1271" name="hol[]" type="checkbox" value="Eid" />
                  <label for="cookstr-checkbox-1271">Eid</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1284" name="hol[]" type="checkbox" value="Yom Kippur" />
                  <label for="cookstr-checkbox-1284">Yom Kippur</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1269" name="hol[]" type="checkbox" value="Diwali" />
                  <label for="cookstr-checkbox-1269">Diwali</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1273" name="hol[]" type="checkbox" value="Halloween" />
                  <label for="cookstr-checkbox-1273">Halloween</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1282" name="hol[]" type="checkbox" value="Thanksgiving" />
                  <label for="cookstr-checkbox-1282">Thanksgiving</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1265" name="hol[]" type="checkbox" value="Chanukkah" />
                  <label for="cookstr-checkbox-1265">Chanukkah</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1267" name="hol[]" type="checkbox" value="Christmas" />
                  <label for="cookstr-checkbox-1267">Christmas</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1274" name="hol[]" type="checkbox" value="Kwanzaa" />
                  <label for="cookstr-checkbox-1274">Kwanzaa</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="course" search-key="crs">
          <div class="cookstr-field-name">
            <a href="#">Course</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1471" name="crs[]" type="checkbox" value="antipasto/mezze" />
                  <label for="cookstr-checkbox-1471">Antipasto/Mezze</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1472" name="crs[]" type="checkbox" value="appetizer" />
                  <label for="cookstr-checkbox-1472">Appetizer</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1473" name="crs[]" type="checkbox" value="cold appetizer" />
                  <label for="cookstr-checkbox-1473">Cold Appetizer</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1474" name="crs[]" type="checkbox" value="hot appetizer" />
                  <label for="cookstr-checkbox-1474">Hot Appetizer</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1475" name="crs[]" type="checkbox" value="dessert" />
                  <label for="cookstr-checkbox-1475">Dessert</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1476" name="crs[]" type="checkbox" value="hors d'oeuvre" />
                  <label for="cookstr-checkbox-1476">Hors D'oeuvre</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1477" name="crs[]" type="checkbox" value="main course" />
                  <label for="cookstr-checkbox-1477">Main Course</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1478" name="crs[]" type="checkbox" value="side dish" />
                  <label for="cookstr-checkbox-1478">Side Dish</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1479" name="crs[]" type="checkbox" value="starch" />
                  <label for="cookstr-checkbox-1479">Starch</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1480" name="crs[]" type="checkbox" value="vegetable" />
                  <label for="cookstr-checkbox-1480">Vegetable</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1481" name="crs[]" type="checkbox" value="tapas/small plates" />
                  <label for="cookstr-checkbox-1481">Tapas/Small Plates</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="meal" search-key="mea">
          <div class="cookstr-field-name">
            <a href="#">Meal</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1358" name="mea[]" type="checkbox" value="breakfast" />
                  <label for="cookstr-checkbox-1358">Breakfast</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1359" name="mea[]" type="checkbox" value="brunch" />
                  <label for="cookstr-checkbox-1359">Brunch</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1360" name="mea[]" type="checkbox" value="lunch" />
                  <label for="cookstr-checkbox-1360">Lunch</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1361" name="mea[]" type="checkbox" value="dinner" />
                  <label for="cookstr-checkbox-1361">Dinner</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1363" name="mea[]" type="checkbox" value="snack" />
                  <label for="cookstr-checkbox-1363">Snack</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="season" search-key="sea">
          <div class="cookstr-field-name">
            <a href="#">Season</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1484" name="sea[]" type="checkbox" value="fall" />
                  <label for="cookstr-checkbox-1484">Fall</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1487" name="sea[]" type="checkbox" value="winter" />
                  <label for="cookstr-checkbox-1487">Winter</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1485" name="sea[]" type="checkbox" value="spring" />
                  <label for="cookstr-checkbox-1485">Spring</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1486" name="sea[]" type="checkbox" value="summer" />
                  <label for="cookstr-checkbox-1486">Summer</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="mood" search-key="moo">
          <div class="cookstr-field-name">
            <a href="#">Mood</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1366" name="moo[]" type="checkbox" value="adventurous" />
                  <label for="cookstr-checkbox-1366">Adventurous</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1367" name="moo[]" type="checkbox" value="blue" />
                  <label for="cookstr-checkbox-1367">Blue</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1365" name="moo[]" type="checkbox" value="romantic" />
                  <label for="cookstr-checkbox-1365">Romantic</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1368" name="moo[]" type="checkbox" value="stressed" />
                  <label for="cookstr-checkbox-1368">Stressed</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1369" name="moo[]" type="checkbox" value="tired" />
                  <label for="cookstr-checkbox-1369">Tired</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="method" search-key="mth">
          <div class="cookstr-field-name">
            <a href="#">Method</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1343" name="mth[]" type="checkbox" value="grilling" />
                  <label for="cookstr-checkbox-1343">Grilling</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1357" name="mth[]" type="checkbox" value="stir-frying" />
                  <label for="cookstr-checkbox-1357">Stir Frying</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1351" name="mth[]" type="checkbox" value="roasting" />
                  <label for="cookstr-checkbox-1351">Roasting</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1338" name="mth[]" type="checkbox" value="braising" />
                  <label for="cookstr-checkbox-1338">Braising</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1344" name="mth[]" type="checkbox" value="microwaving" />
                  <label for="cookstr-checkbox-1344">Microwaving</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1340" name="mth[]" type="checkbox" value="broiling" />
                  <label for="cookstr-checkbox-1340">Broiling</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="entertaining" search-key="ent">
          <div class="cookstr-field-name">
            <a href="#">Entertaining</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1491" name="ent[]" type="checkbox" value="Cocktail Party" />
                  <label for="cookstr-checkbox-1491">Cocktail Party</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1492" name="ent[]" type="checkbox" value="Family Get-together" />
                  <label for="cookstr-checkbox-1492">Family Get Together</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1490" name="ent[]" type="checkbox" value="Buffet" />
                  <label for="cookstr-checkbox-1490">Buffet</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1493" name="ent[]" type="checkbox" value="Casual Dinner Party" />
                  <label for="cookstr-checkbox-1493">Casual Dinner Party</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1494" name="ent[]" type="checkbox" value="Formal Dinner Party" />
                  <label for="cookstr-checkbox-1494">Formal Dinner Party</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1496" name="ent[]" type="checkbox" value="Cooking for a date" />
                  <label for="cookstr-checkbox-1496">Cooking For A Date</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="dietary_consideration" search-key="dit">
          <div class="cookstr-field-name">
            <a href="#">Dietary Consideration</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1295" name="dit[]" type="checkbox" value="diabetic" />
                  <label for="cookstr-checkbox-1295">Diabetic</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1296" name="dit[]" type="checkbox" value="egg-free" />
                  <label for="cookstr-checkbox-1296">Egg Free</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1297" name="dit[]" type="checkbox" value="gluten-free" />
                  <label for="cookstr-checkbox-1297">Gluten Free</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1298" name="dit[]" type="checkbox" value="halal" />
                  <label for="cookstr-checkbox-1298">Halal</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1299" name="dit[]" type="checkbox" value="high fiber" />
                  <label for="cookstr-checkbox-1299">High Fiber</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1300" name="dit[]" type="checkbox" value="high-calcium" />
                  <label for="cookstr-checkbox-1300">High Calcium</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1301" name="dit[]" type="checkbox" value="infant" />
                  <label for="cookstr-checkbox-1301">Infant</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1302" name="dit[]" type="checkbox" value="kosher" />
                  <label for="cookstr-checkbox-1302">Kosher</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1303" name="dit[]" type="checkbox" value="lactose-free" />
                  <label for="cookstr-checkbox-1303">Lactose Free</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1304" name="dit[]" type="checkbox" value="low calorie" />
                  <label for="cookstr-checkbox-1304">Low Calorie</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1305" name="dit[]" type="checkbox" value="low carb" />
                  <label for="cookstr-checkbox-1305">Low Carb</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1306" name="dit[]" type="checkbox" value="low cholesterol" />
                  <label for="cookstr-checkbox-1306">Low Cholesterol</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1308" name="dit[]" type="checkbox" value="low saturated fat" />
                  <label for="cookstr-checkbox-1308">Low Saturated Fat</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1309" name="dit[]" type="checkbox" value="low sodium" />
                  <label for="cookstr-checkbox-1309">Low Sodium</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1310" name="dit[]" type="checkbox" value="low-fat" />
                  <label for="cookstr-checkbox-1310">Low Fat</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1311" name="dit[]" type="checkbox" value="peanut free" />
                  <label for="cookstr-checkbox-1311">Peanut Free</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1307" name="dit[]" type="checkbox" value="soy free" />
                  <label for="cookstr-checkbox-1307">Soy Free</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1312" name="dit[]" type="checkbox" value="tree nut free" />
                  <label for="cookstr-checkbox-1312">Tree Nut Free</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1313" name="dit[]" type="checkbox" value="vegan" />
                  <label for="cookstr-checkbox-1313">Vegan</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1314" name="dit[]" type="checkbox" value="vegetarian" />
                  <label for="cookstr-checkbox-1314">Vegetarian</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="cuisine" search-key="cui">
          <div class="cookstr-field-name">
            <a href="#">Cuisine</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1503" name="cui[]" type="checkbox" value="American" />
                  <label for="cookstr-checkbox-1503">American</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1552" name="cui[]" type="checkbox" value="French" />
                  <label for="cookstr-checkbox-1552">French</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1519" name="cui[]" type="checkbox" value="Asian" />
                  <label for="cookstr-checkbox-1519">Asian</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1571" name="cui[]" type="checkbox" value="Italian" />
                  <label for="cookstr-checkbox-1571">Italian</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1618" name="cui[]" type="checkbox" value="Jewish" />
                  <label for="cookstr-checkbox-1618">Jewish</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1619" name="cui[]" type="checkbox" value="Latin American" />
                  <label for="cookstr-checkbox-1619">Latin American</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1642" name="cui[]" type="checkbox" value="Middle Eastern" />
                  <label for="cookstr-checkbox-1642">Middle Eastern</label>
                </li>
              
            </ul>
          </div>
        </li>
      
        
        <li class="cookstr-search-field" name="taste_texture" search-key="tas">
          <div class="cookstr-field-name">
            <a href="#">Taste & Texture</a>
          </div>
          <div class="cookstr-form-element">
            <ul class="cookstr-checkbox-list">
              
                <li>
                  <input id="cookstr-checkbox-1316" name="tas[]" type="checkbox" value="cheesy" />
                  <label for="cookstr-checkbox-1316">Cheesy</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1319" name="tas[]" type="checkbox" value="crunchy" />
                  <label for="cookstr-checkbox-1319">Crunchy</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1326" name="tas[]" type="checkbox" value="nutty" />
                  <label for="cookstr-checkbox-1326">Nutty</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1333" name="tas[]" type="checkbox" value="tangy" />
                  <label for="cookstr-checkbox-1333">Tangy</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1335" name="tas[]" type="checkbox" value="umami" />
                  <label for="cookstr-checkbox-1335">Umami</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1318" name="tas[]" type="checkbox" value="creamy" />
                  <label for="cookstr-checkbox-1318">Creamy</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1325" name="tas[]" type="checkbox" value="meaty" />
                  <label for="cookstr-checkbox-1325">Meaty</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1331" name="tas[]" type="checkbox" value="hot &amp; spicy" />
                  <label for="cookstr-checkbox-1331">Hot & Spicy</label>
                </li>
              
                <li>
                  <input id="cookstr-checkbox-1334" name="tas[]" type="checkbox" value="tart" />
                  <label for="cookstr-checkbox-1334">Tart</label>
                </li>
              
            </ul>
          </div>
        </li>
      
    </ul>
  
  <p class='refine-instructions'>Make selections, then <a href='#' class='refine-submit-link'>click here</a></p>
</form>


  <script src="http://staging.cookstr.com/javascripts/cookstr-search-widget-jquery.js?1244017675" type="text/javascript"></script>


<script type="text/javascript" charset="utf-8">
  

  Cookstr.SearchWidget.init();
</script>

