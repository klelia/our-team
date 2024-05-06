const { createApp } = Vue;

createApp({
  data() {
    return {
      team: [],
      apiUrl: "server.php",
      lastId: null,
      newMember: {
        name: "",
        role: "",
        userImg: "",
      },
      editIndex: null,
      newrole: "",
    };
  },
  methods: {
    addMember() {
      const member = { ...this.newMember };
      this.newMember = {
        name: "",
        surname: "",
        role: "",
        userImg: "",
      };
      this.lastId += 1;
      member.id = this.lastId;

      const data = new FormData();
      // data.append("id", member.id);
      // data.append("name", member.name);
      // data.append("surname", member.surname);
      // data.append("role", member.role);
      // data.append("userImg", member.userImg);
      for (let key in member) {
        data.append(key, member[key]);
      }

      axios
        .post(this.apiUrl, data)
        .then((res) => {
          console.log(res.data);
          this.team = res.data;
          this.lastId = this.team.length - 1;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {});
    },
    setEdit(index) {
      this.editIndex = index;
      this.newrole = "";
    },
    updateMember(index) {
      this.editIndex = null;
      if (this.newrole) {
        this.team[index].role = this.newrole;
        const data = this.team[index];
        data.idx = index;
        axios.put(this.apiUrl, data).then((res) => {
          console.log(res.data);
          this.team = res.data;
        });

        this.newrole = "";
      }
    },
    deleteMember(event, index) {
      event.preventDefault();
      //this.team.splice(index, 1);
      const data = {
        id: index,
      };
      axios.delete(this.apiUrl, { data }).then((res) => {
        console.log(res.data);
        this.team = res.data;
        this.lastId = this.team.length - 1;
      });
    },
    getData() {
      axios
        .get(this.apiUrl)
        .then((res) => {
          console.log(res.data);
          this.team = res.data;
          this.lastId = this.team.length - 1;
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {});
    },
  },
  created() {
    this.getData();
  },
}).mount("#app");
