import http from "../http-common";

class DeveloperDataService {
  getAll() {
    return http.get("/developers");
  }

  get(id) {
    return http.get(`/developers/${id}`);
  }

  create(data) {
    return http.post("/developers", data);
  }

  update(id, data) {
    return http.put(`/tutorials/${id}`, data);
  }

  delete(id) {
    return http.delete(`/tutorials/${id}`);
  }

  deleteAll() {
    return http.delete(`/tutorials`);
  }

  findByTitle(title) {
    return http.get(`/tutorials?title=${title}`);
  }
}

export default new TutorialDataService();
