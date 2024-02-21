<tr>
    <td class="border px-4 py-2">{{ $article->id }}</td>
    <td class="border px-4 py-2">{{ $article->title }}</td>
    <td class="border px-4 py-2">{{ $article->description }}</td>
    <td class="border px-4 py-2">{{ isset($article->published_at) ? $article->published_at->format('d M Y') : '' }}</td>
    <td class="border px-4 py-2">Киа Seed</td>
    <x-panels.admin.admin_tables_buttons_edit href="#"/>
    <x-panels.admin.admin_tables_buttons_delete action="#"/>
</tr>
