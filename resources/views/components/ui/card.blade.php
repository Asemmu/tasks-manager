@props(['name', 'count', 'icon'])
<div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center fa-2x w-25">
                  <i class="{{ $icon }}"></i>
                </div>
                <div class="media-body text-right">
                  <h3>{{ $count }}</h3>
                  <span>{{ $name }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>