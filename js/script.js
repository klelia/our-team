const { createApp } = Vue;

createApp({
  data() {
    return {
      team: [
        {
          id: 1,
          name: "Wayne",
          surname: "Barnett",
          role: "Founder & CEO",
          userImg: "wayne-barnett-founder-ceo.jpg",
        },
        {
          id: 2,
          name: "Angela",
          surname: "Caroll",
          role: "Chief Editor",
          userImg: "angela-caroll-chief-editor.jpg",
        },
        {
          id: 3,
          name: "Walter",
          surname: "Gordon",
          role: "Office Manager",
          userImg: "walter-gordon-office-manager.jpg",
        },
        {
          id: 4,
          name: "Angela",
          surname: "Lopez",
          role: "Social Media Manager",
          userImg: "angela-lopez-social-media-manager.jpg",
        },
        {
          id: 5,
          name: "Scott",
          surname: "Estrada",
          role: "Developer",
          userImg: "scott-estrada-developer.jpg",
        },
        {
          id: 6,
          name: "Barbara",
          surname: "Ramos",
          role: "Graphic Designer",
          userImg: "barbara-ramos-graphic-designer.jpg",
        },
      ],
      lastId: 6,
      newMember: {
        name: "",
        role: "",
        imgUrl: "",
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
        role: "",
        imgUrl: "",
      };
      this.lastId += 1;
      member.id = this.lastId;
      this.team.push(member);
    },
    setEdit(index) {
      this.editIndex = index;
      this.newrole = "";
    },
    updateMember(index) {
      this.editIndex = null;
      if (this.newrole) {
        this.team[index].role = this.newrole;
        this.newrole = "";
      }
    },
    deleteMember(event, index) {
      event.preventDefault();
      this.team.splice(index, 1);
    },
  },
  created() {},
}).mount("#app");
