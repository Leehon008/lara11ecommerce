     <ul class="account-nav">
         <li><a href="{{ route('user.index') }}" class="menu-link menu-link_us-s">Orders</a></li>
         <li><a href="{{ route('create.payment') }}" class="menu-link menu-link_us-s">Make Payment</a></li>
         <li><a href="{{ route('user.account-details') }}" class="menu-link menu-link_us-s">Account Details</a></li>

         <form action="{{ route('logout') }}" method="post" id="logout-form">
             @csrf
             <a href="{{ route('logout') }}" class="menu-link menu-link_us-s"
                 onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout</a>
         </form>
         </li>
     </ul>
