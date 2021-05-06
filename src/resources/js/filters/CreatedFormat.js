import moment from "moment";

export default function (date) {
    return moment(date).locale('nl').fromNow();
}
