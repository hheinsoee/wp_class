<div class="postsContainer">
</div>

<center>
    <div class="loader"></div>
    <div class="message h5"></div>
</center>
<?php
function show_timeline($url = "")
{
    if ($url == "") {
        $category = isset($_GET['c']) ? '/c/' . $_GET['c'] : '';
    }

?>
    <script>
        (function() {

            const postsContainer = document.querySelector('.postsContainer');
            const loaderEl = document.querySelector('.loader');
            const messageEl = document.querySelector('.message');

            const hideLoader = () => {
                loaderEl.classList.remove('show');
            };

            const showLoader = () => {
                loaderEl.classList.add('show');
            };
            const showMessage = (msg) => {
                messageEl.innerHTML = msg
            }
            // get the posts from API
            const getPosts = async (page, limit) => {

                // const API_URL = `https://api.javascripttutorial.net/v1/quotes/?page=${page}&limit=${limit}`;
                const API_URL = `<?= $url . @$category; ?>/page/${page}/?json`;
                const response = await fetch(API_URL);
                // handle 404
                if (!response.ok) {
                    throw new Error(`An error occurred: ${response.status}`);
                }
                return await response.json();
            }

            // show the posts

            const image = (post) => {
                if (post.images.m) {
                    return `
                    <div>
                        <img class="card-img" onclick="seemore('${post.id}')"
                        src="${post.images.m}"/>
                    </div>`
                } else {
                    return ""
                }
            };
            const postBody = (post) => {
                if (post.content.length > 100) {
                    return `
                    <div class="card-text seemore" id="seemore_${post.id}" onclick="seemore('${post.id}')">
                        ${post.content}
                    </div>
                    <div class="seemore_bt" onclick="seemore('${post.id}')"><i id="seemore_bt_${post.id}">see more</i></div>
                    `
                } else {
                    return `
                    <div class="card-text">
                        ${post.content}
                    </div>
                `
                }
            }
            const shareData = (post) => {
                return {
                    title: post.title,
                    text: post.excerpt,
                    url: `<?= home_url(); ?>/blog/${post.id}`
                }
            }
            const showPosts = (posts) => {
                console.log(posts);
                posts.forEach(post => {
                    const postEl = document.createElement('blockpost');
                    postEl.classList.add('post');
                    postEl.innerHTML = `
                <article class="card my-3">
                    <div class="p-3">
                        <h5 class="card-title">${post.title}</h5>
                        <a href="/${post.id}">
                            <div class="post-time small">
                                ${post.time}
                            </div>
                        </a>
                    </div>
                    <div class="card-body">
                        ${postBody(post)}
                    </div>
                    ${image(post)}
                    <div class="d-flex card-footer small">
                        <a href="/author/${post.author.user_nicename}/">
                        ${post.author.name}
                        </a>
                        <div style="flex:1"></div>
                        <span onclick="heinShare(${shareData})">Share</span>
                    </div>
                </article>
                `;
                    postsContainer.appendChild(postEl);
                });
            };



            // const hasMorePosts = (page, limit, total) => {
            //     const startIndex = (page - 1) * limit + 1;
            //     return total === 0 || startIndex < total;
            // };

            // load posts
            const loadPosts = async (page, limit) => {

                // show the loader
                showLoader();
                loading = true;
                showMessage('Loading')
                // 0.5 second later
                setTimeout(async () => {
                    try {
                        // if having more posts to fetch
                        if (hasMorePosts) {
                            // call the API to get posts
                            const response = await getPosts(page, limit);
                            // show posts
                            showPosts(response.data);
                            showMessage('');
                        }
                    } catch (error) {
                        console.log(error.message);
                        loading = false;
                        hasMorePosts = false;
                        showMessage('no more')
                    } finally {
                        hideLoader();
                        loading = false;
                    }
                }, 500);

            };

            // control variables
            let currentPage = 1;
            const limit = 10;
            let total = 0;
            let loading = false;
            let hasMorePosts = true;

            window.addEventListener('scroll', () => {
                const {
                    scrollTop,
                    scrollHeight,
                    clientHeight
                } = document.documentElement;

                if (scrollTop + clientHeight >= scrollHeight - 200 && !loading && hasMorePosts) {
                    currentPage++;
                    loadPosts(currentPage, limit)
                }
            }, {
                passive: true
            });

            // initialize
            loadPosts(currentPage, limit);

        })();
    </script>
<?php } ?>