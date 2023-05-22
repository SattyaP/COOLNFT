<div class="latest">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-lg-3">
            <a href="{{ url('/post/'. $post->title) }}"><div class="card mt-3">
                <img class="img-fluid" src="{{ Storage::url('public/posts/').$post->image }}">
                <div class="detail-card p-3">
                    <h4><span id="judul-nft">{{ $post->title }}</span> <span id="harga">{{ $post->price}} ETH</span>
                    </h4>
                    <p class="name-user">Owned by <span style="font-weight: 600; color: #005ac7">{{ $post->user->name}}</span></p>
                </div>
            </div></a>
        </div>
        @endforeach
    </div>
</div>
