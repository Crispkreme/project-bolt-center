
const DashboardCard = ({ icon: Icon, percentage, target, price, description, progressColor, progress }) => {
  return (
    <div className="bg-white rounded-lg shadow-lg p-4">
      <div className="grid grid-cols-2 gap-3">
        <div>
          <div className={`w-12 h-12 ${progressColor} rounded-full flex items-center justify-center shadow-lg`}>
            <Icon className="text-white text-2xl" />
          </div>
        </div>
        <div className="flex flex-col justify-end items-end">
          <h3 className="text-dark my-1 text-xl">
            ${price}
          </h3>
          <p className="text-muted mb-1 text-sm text-gray-500">{description}</p>
        </div>
      </div>
      <div className="mt-3">
        <h6 className="text-xs uppercase flex justify-between mb-1">
          <span>{target}</span>
          <span>{percentage}</span>
        </h6>
        <div className="w-full bg-gray-200 rounded-full h-2">
          <div className={`${progressColor} h-2 rounded-full`} style={{ width: `${progress}%` }}></div>
        </div>
      </div>
    </div>
  );
};

export default DashboardCard;
