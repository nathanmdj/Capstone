  <!-- Modal -->
  <div class="modal fade" id="newMessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content bg-primary">
              <div class="d-flex justify-content-between p-3 ">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">New Message</h1>
                  <button type="button" class="btn text-white py-0 px-3" data-bs-dismiss="modal"
                      aria-label="Close"><span class="bi bi-x-lg "></span></button>
              </div>
              <div class="modal-body pt-0">
                  <div class="search d-flex mb-3">
                      <span class="bi bi-search"></span>
                      <input id="searchInput" type="text" class="form-control bg-primary border-0 text-white"
                          placeholder="Search for people. . ." oninput="handleSearch(this.value)" autocomplete="off">
                  </div>
                  <div class="user-list">
                      @foreach ($user as $user)
                          @if ($user->id != auth()->id())
                              <form action="{{ route('thread.create', $user->id) }}" method="POST">
                                  @csrf
                                  <button class="btn text-white">
                                      <div class="user-info d-flex ">
                                          <div class="img-container">
                                              <img src="{{ $user->info->getImageUrl() }}" alt="">
                                          </div>
                                          <div class="name ms-3">
                                              {{ $user->info->name }}
                                              <p>{{ '@' . $user->username }}</p>

                                          </div>
                                      </div>
                                  </button>
                              </form>
                          @endif
                      @endforeach


                  </div>
              </div>
          </div>
      </div>
  </div>

  <script>
      function handleSearch(query) {
          // Send AJAX request to the search route
          fetch(`/messages/user/search?query=${query}`)
              .then(response => response.json())
              .then(data => {
                  // Clear previous user list
                  console.log(data);
                  const userList = document.querySelector('.user-list');
                  userList.innerHTML = '';

                  // Render new user list based on search results
                  data.forEach(user => {
                      const userContainer = document.createElement('div');
                      const imgSrc = user.photo ? `/storage/${user.photo}` : '/storage/profile/default.png';

                      userContainer.classList.add('user-info');
                      userContainer.innerHTML = `
                      <a href="">
                        <div class="d-flex">
                    <div class="img-container">
                        <img src="${imgSrc}" alt="">
                    </div>
                    <div class="name ms-3">
                        ${user.name}
                        <p>@${user.username}</p>
                    </div>
                    </div>
                    </a>
                `;
                      userList.appendChild(userContainer);
                  });
              })
              .catch(error => console.error('Error:', error)); // Handle errors properly
      }
  </script>
