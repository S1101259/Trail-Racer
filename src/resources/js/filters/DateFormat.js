import moment from "moment";

export default function (time) {
    return moment(time).format('m:ss.SSS');
}
