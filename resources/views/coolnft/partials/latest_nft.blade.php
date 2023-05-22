<div class="latest">
    <div class="container">
        <h1>Latest NFT's</h1>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-lg-3">
                <a href="{{ url('/post/'. $post->title) }}"><div class="card mt-3">
                    <img class="img-fluid" src="{{ Storage::url('public/posts/').$post->image }}">
                    <div class="detail-card p-3">
                        <h4><span id="judul-nft">{{ $post->title }}</span> <span id="harga">{{ $post->price}} ETH</span></h4>
                        <p class="name-user">Owned by <span style="font-weight: 600; color: #005ac7">{{ $post->user->name}}</span></p>
                        <span style="color:#fff; background-color: #005ac7; border-radius: 5px; padding: 5px 10px;">{{ $post->category->name }} <span style="float: right; color: #005ac7; font-size: 14px; margin-top: 10px">See more</span></span>
                    </div>
                </div></a>
            </div>
            @endforeach
        </div>
    </div>
</div>
