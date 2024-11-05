<nav class="bg-stone-200  flex items-center justify-between">
  <img src="/images/logo.png" width="200" alt="MBO Go digital">
        
  
  <!-- navigation -->

  <nav class="nav font-semibold">
            <ul class="flex items-center">
                <li
                    class="p-4 border-b-2 border-green-500 border-opacity-0 hover:border-blue-100 hover:text-blue-500 duration-200 cursor-pointer">
                    <a href="/">User panel</a>
                </li>
            </ul>
        </nav>

  <!-- Login Button -->
  <form method="GET" action="/admin/auth/logout/" class="max-w-sm mx-4">
    <div class="flex items-center py-2">
      <button
        class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 border-4 text-lg text-white py-1 px-6 rounded"
        type="submit">
        Logout
      </button>
    </div>
  </form>
</nav>