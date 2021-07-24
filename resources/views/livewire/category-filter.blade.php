 <div class="sidebar-list-style">
     <ul>
         @foreach ($category->subcategories as $subcategory)
             <li><a href="shop.html">{{ $subcategory->name }} <span>4</span></a></li>
         @endforeach
     </ul>
 </div>
