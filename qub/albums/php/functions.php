<?php

function displaynav() {

    include("connections/dbconn.php");
  
          if (!$showBtn) {
              echo "<li class='nav-item'>
              <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='login.php'>Log In</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='register.php'>Register</a>
            </li>
          </ul>
          <form class='form-inline my-2 my-lg-0'>
            <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
          </form> ";
          } else {
            echo "<li class='nav-item'>
            <a class='nav-link' href='albumlist.php'>Top 500 Albums<span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='account.php'>Account</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
          </li>
        </ul>
        <form class='form-inline my-2 my-lg-0'>
          <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
          <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
        </form> ";
          }
        }
      ?>