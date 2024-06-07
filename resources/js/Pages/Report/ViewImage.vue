    <AuthenticatedLayout>
    <template>
    <div class="container">
        <h3>View all image</h3><hr>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Image id</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="image in post_images">
            <td className="border px-4 py-2">{{ image.id }}</td>
            <td>
          <img src="{{ url('public/Image/'.$data->image) }}"
    style="height: 100px; width: 150px;">
            </tr>
          </tbody>
        </table>
      </div>
      </template>
      </AuthenticatedLayout>