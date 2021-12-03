<template>
    <main class="main">
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card mt-2">
        <div class="card-header">
          
            <div class="col-md-12">
              <i class="fa fa-align-justify"></i> Listado de Productos
              <el-button
              plain
            type="success"
            icon="el-icon-circle-plus"
            @click="abrirModal('producto', 'registrar')"
          >Nuevo</el-button>
          
          <el-button
            type="danger"
            icon="el-icon-document"
            @click="cargarPdf()"
          >Reporte</el-button>
            </div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <div class="col-md-12 col-12">
              <div class="input-group">
                <div class="mr-1">
                  <template>
                    <el-select v-model="criterio" placeholder="Select">
                      <el-option
                        v-for="item in options"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value"
                      ></el-option>
                    </el-select>
                  </template>
                </div>

                <div class="mr-1">
                  <el-input
                    @keyup.native.enter="
                                            listarProducto(1, buscar, criterio)
                                        "
                    placeholder="Texto a buscar"
                    v-model="buscar"
                  ></el-input>
                </div>

                <div>
                  <el-button
                    icon="el-icon-search"
                    type="success"
                    @click="
                                            listarProducto(1, buscar, criterio)
                                        "
                  >Buscar</el-button>
                </div>
              </div>
            </div>
          </div>
          <table class="table table-sm table-responsive">
            <thead>
              <tr>
                <th>Opciones</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>UsoTerapeutico</th>
                <th>SustanciaActiva</th>
                <th>PrecioCompra</th>
                <th>PrecioVenta</th>
                <th>FechaVencimiento</th>
                <th>Stock</th>
                <th>Ubicacion</th>
                <th>Lote</th>
                <th>Categoria</th>
                <th>Laboratorio</th>
                <th>Presentacion</th>
                <th>Proveedor</th>
                <th>Descuento</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="producto in arrayProducto" :key="producto.id">
                <td>
                  <button
                    type="button"
                    @click="
                                            abrirModal(
                                                'producto',
                                                'actualizar',
                                                producto
                                            )
                                        "
                    class="btn btn-warning btn-sm"
                  >
                    <i class="icon-pencil"></i>
                  </button>
                  &nbsp;
                  <template v-if="producto.condicion">
                    <button
                      type="button"
                      @click="
                                                desactivarProducto(producto.id)
                                            "
                      class="btn btn-danger btn-sm"
                    >
                      <i class="icon-trash"></i>
                    </button>
                  </template>
                  <template v-else>
                    <button
                      type="button"
                      @click="
                                                activarProducto(producto.id)
                                            "
                      class="btn btn-info btn-sm"
                    >
                      <i class="icon-check"></i>
                    </button>
                  </template>
                </td>
                <td v-text="producto.codigo"></td>
                <td v-text="producto.nombre"></td>
                <td v-text="producto.usoTerapeutico"></td>
                <td v-text="producto.sustanciaActiva"></td>
                <td v-text="producto.precioCompra"></td>
                <td v-text="producto.precio_venta"></td>
                <td v-text="producto.fechaVencimiento"></td>
                <td v-text="producto.stock"></td>
                <td v-text="producto.ubicacion"></td>
                <td v-text="producto.lote"></td>
                <td v-text="producto.categoria"></td>
                <td v-text="producto.laboratorio"></td>
                <td v-text="producto.presentacion"></td>
                <td v-text="producto.proveedor"></td>
                <td v-text="producto.IgvIncluido"></td>
                <td v-text="producto.descuento"></td>
                <td>
                  <div v-if="producto.condicion">
                    <span class="badge badge-success">Activo</span>
                  </div>
                  <div v-else>
                    <span class="badge badge-danger">Desactivado</span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <nav>
            <ul class="pagination">
              <li class="page-item" v-if="pagination.current_page > 1">
                <a
                  class="page-link"
                  href="#"
                  @click.prevent="
                                        cambiarPagina(
                                            pagination.current_page - 1,
                                            buscar,
                                            criterio
                                        )
                                    "
                >Ant</a>
              </li>
              <li
                class="page-item"
                v-for="page in pagesNumber"
                :key="page"
                :class="[page == isActived ? 'active' : '']"
              >
                <a
                  class="page-link"
                  href="#"
                  @click.prevent="
                                        cambiarPagina(page, buscar, criterio)
                                    "
                  v-text="page"
                ></a>
              </li>

              <li
                class="page-item"
                v-if="
                                    pagination.current_page <
                                        pagination.last_page
                                "
              >
                <a
                  class="page-link"
                  href="#"
                  @click.prevent="
                                        cambiarPagina(
                                            pagination.current_page + 1,
                                            buscar,
                                            criterio
                                        )
                                    "
                >Sig</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    
</template>