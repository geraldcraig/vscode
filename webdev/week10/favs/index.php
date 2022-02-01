<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sessions Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
  </head>

  <body>
    <section class="section">
      <div class="container">

        <h1 class="title">My Favourites</h1>

        <form action="process.php" method="POST">
          <p class="subtitle">
            <h2> What's your favourite colour?</h2>
          </p>
          <div class="field">
            <div class="control">
              <input name="fcolour" class="input is-primary" type="text" placeholder="favourite colour">
            </div>
          </div>

          <p class="subtitle">
            <h2> What's your favourite animal?</h2>
          </p>
          <div class="field">
            <div class="control">
              <div class="select is-primary">
                <select name="fpet">
                  <option>dog</option>
                  <option>cat</option>
                  <option>sheep</option>
                  <option>pig</option>
                </select>
              </div>
            </div>
          </div>
            
          <input type="submit" class="button is-primary" value="submit"/>	 
        
        </form>
          
      </div>
    </section>
  </body>
</html>


