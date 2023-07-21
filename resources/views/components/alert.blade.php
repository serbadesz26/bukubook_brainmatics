<div>
     {{-- Alert --}}
     @if(session('success'))
     {{-- Jika ada alert sukses --}}
     <div class="alert alert-success mb-3" role="alert">
         {{ session('success') }}
     </div>
     @elseif(session('error'))
     {{-- Jika ada alert error --}}
     <div class="alert alert-danger mb-3" role="alert">
        {{ session('error') }}
     </div>
     @endif
</div>
