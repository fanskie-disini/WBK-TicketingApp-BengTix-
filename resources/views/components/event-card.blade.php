@props([
    'title',
    'date',
    'location',
    'price',
    'image',
    'href' => null,
])

@php
    // Format Indonesian price
    $formattedPrice = $price
        ? 'Rp ' . number_format($price, 0, ',', '.')
        : 'Harga tidak tersedia';

    // Format Indonesian date
    $formattedDate = $date
        ? \Carbon\Carbon::parse($date)->locale('id')->translatedFormat('d F Y, H:i')
        : 'Tanggal tidak tersedia';
@endphp

<a href="{{ $href ?? '#' }}" class="block">
  <div class="card bg-base-100 h-96 shadow-sm hover:shadow-md transition-shadow duration-300">
      <figure>
          <img src="{{ $image ? asset($image) : 'https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp' }}"
            alt="{{ $title }}" class="h-48 w-full object-cover" />
      </figure>

      <div class="card-body">
          <h2 class="card-title">
              {{ $title }}
          </h2>

          <p class="text-sm text-gray-500">
              {{ $formattedDate }}
          </p>

          <p class="text-sm">
              📍 {{ $location }}
          </p>

          <p class="font-bold text-lg mt-2">
              {{ $formattedPrice }}
          </p>

      </div>
  </div>
</a>
